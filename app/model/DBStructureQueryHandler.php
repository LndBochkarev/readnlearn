<?php


class DBStructureQueryHandler extends AbstractQueryHandler {
    
    public function __construct($registry, $db) {
        parent::__construct($registry, $db);
    }
    
    
    /**
     * 
     * @return mixed Array describing the structure of DB
     */
    public function getDBStructure() {

        $query = 'SELECT TABLE_NAME, COLUMN_NAME as Name, COLUMN_TYPE as Type, IS_NULLABLE as "Nullable", EXTRA as Extra
        FROM INFORMATION_SCHEMA.COLUMNS as cols
        WHERE cols.TABLE_SCHEMA = :db_name';

        $statement = $this->db->prepare($query);
        $statement->bindValue('db_name', $this->registry['db_name']);
        $statement->execute();

        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($array as $row) {
            $key = array_shift($row);
            if (!isset($result[$key])) {
                $result[$key] = [];
            }

            array_push($result[$key], $row);
        }

        return $result;
    }
}
