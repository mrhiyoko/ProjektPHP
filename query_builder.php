<?PHP

interface SQLQueryBuilder
{
	public function select(string $table, array $fields): SQLQueryBuilder;
	
	public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;
	
	public function limit(int $start, int $offset): SQLQueryBuilder;

// +100 other SQL syntax methods...
	
	public function getSQL(): string;
}

class MysqlQueryBuilder implements SQLQueryBuilder
{
	protected $query;
	
	protected function reset(): void
	{
		$this->query = new \stdClass;
	}
	
	/**
	 * Build a base SELECT query.
	 */
	public function select(string $table, array $fields): SQLQueryBuilder
	{
		$this->reset();
		$this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
		$this->query->type = 'select';
		
		return $this;
	}
	
	/**
	 * Add a WHERE condition.
	 */
	public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
	{
		if (!in_array($this->query->type, ['select', 'update'])) {
			throw new \Exception("WHERE can only be added to SELECT OR UPDATE");
		}
		$this->query->where[] = "$field $operator '$value'";
		
		return $this;
	}
	
	/**
	 * Add a LIMIT constraint.
	 */
	public function limit(int $start, int $offset): SQLQueryBuilder
	{
		if (!in_array($this->query->type, ['select'])) {
			throw new \Exception("LIMIT can only be added to SELECT");
		}
		$this->query->limit = " LIMIT " . $start . ", " . $offset;
		
		return $this;
	}
	
	/**
	 * Get the final query string.
	 */
	public function getSQL(): string
	{
		$query = $this->query;
		$sql = $query->base;
		if (!empty($query->where)) {
			$sql .= " WHERE " . implode(' AND ', $query->where);
		}
		if (isset($query->limit)) {
			$sql .= $query->limit;
		}
		$sql .= ";";
		return $sql;
	}
}

/**
 * This Concrete Builder is compatible with PostgreSQL. While Postgres is very
 * similar to Mysql, it still has several differences. To reuse the common code,
 * we extend it from the MySQL builder, while overriding some of the building
 * steps.
 */
class PostgresQueryBuilder extends MysqlQueryBuilder
{
	/**
	 * Among other things, PostgreSQL has slightly different LIMIT syntax.
	 */
	public function limit(int $start, int $offset): SQLQueryBuilder
	{
		parent::limit($start, $offset);
		
		$this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;
		
		return $this;
	}

// + tons of other overrides...
}


/**
 * Note that the client code uses the builder object directly. A designated
 * Director class is not necessary in this case, because the client code needs
 * different queries almost every time, so the sequence of the construction
 * steps cannot be easily reused.
 *
 * Since all our query builders create products of the same type (which is a
 * string), we can interact with all builders using their common interface.
 * Later, if we implement a new Builder class, we will be able to pass its
 * instance to the existing client code without breaking it thanks to the
 * SQLQueryBuilder interface.
 */
function clientCode(SQLQueryBuilder $queryBuilder)
{
// ...
	
	$query = $queryBuilder
		->select("users", ["name", "email", "password"])
		->where("age", 18, ">")
		->where("age", 30, "<")
		->limit(10, 20)
		->getSQL();
	
	echo $query;

// ...
}