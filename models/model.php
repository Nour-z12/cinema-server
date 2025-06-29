<?php 
abstract class model {
    protected static string $table;
    protected static string $primary_key = "id";


    public static function find(mysqli $conn, int $id) {
        $sql = sprintf("SELECT * FROM %s WHERE %s = ?", 
                      static::$table, 
                      static::$primary_key);
        
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }


    public static function all(mysqli $conn) {
        $sql = sprintf("SELECT * FROM %s", static::$table);
        
        $query = $conn->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()) {
            $objects[] = new static($row);
        }

        return $objects;
    }

    public static function add(mysqli $conn, array $data): ?static {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $types = str_repeat("s", count($data)); 
        
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", 
                      static::$table, 
                      $columns, 
                      $placeholders);
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...array_values($data));
        
        if ($stmt->execute()) {
            $id = $conn->insert_id;
            return static::find($conn, $id);
        }
        
        return null;
    }

    public function update(mysqli $conn, array $data): bool {
    $setClause = implode(" = ?, ", array_keys($data)) . " = ?";
    $types = str_repeat("s", count($data) + 1); 
    
    $sql = sprintf("UPDATE %s SET %s WHERE %s = ?", 
                  static::$table, 
                  $setClause, 
                  static::$primary_key);
    
    $values = array_values($data);
    $values[] = $this->{static::$primary_key};
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$values);
    
    return $stmt->execute();
}

    
}