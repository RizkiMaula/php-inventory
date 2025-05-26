<?php 

function insertData($table, $data) {
    global $koneksi;
    // ambil column dan placeholder
    $colums = implode(',', array_keys($data)); 
    $placeholder = rtrim(str_repeat('?,', count($data)), ',');

    // tentukan tipe data otomatis
    $type = '';
    foreach ($data as $value) {
        if (is_int($value)) {
            $type .= 'i';
        } elseif (is_float($value)){
            $type .= 'd';
        } else {
            $type .= 's';
        }
    }
    
    // logic insert
    $query = "INSERT INTO $table ($colums) VALUES ($placeholder)";
    $stmt = mysqli_prepare($koneksi, $query);

    if (!$stmt) {
        return['success' => false, 'message' => 'gagal menambahkan data: ' . mysqli_error($koneksi)];
    }

    // bind data
    $values = array_values($data);
    mysqli_stmt_bind_param($stmt, $type, ...$values);


    // execution

    $success = mysqli_stmt_execute($stmt);
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);


    return [
        'success' => $success, 'message' => $error];
    }

    // show data
    function showData($table) {
        global $koneksi;
        $query = mysqli_prepare($koneksi, "SELECT * FROM $table");
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($query);
        return $result;
    }
        // show data with join
        function showDataJoin($table, $table2, $joinCondition, $columns = "*") {
        global $koneksi;

        //safety. prevent sql injection
        $allowedTables = ['incoming_goods', 'outcoming_goods', 'transactions', 'transactions_details', 'stock', 'products'];
        if (!in_array($table, $allowedTables) || !in_array($table2, $allowedTables)) {
            echo "invalid request";
            exit;
        }

        $query = "SELECT $columns FROM $table INNER JOIN $table2 ON $joinCondition";

        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    // join with 3 tables
    function showDataJoin3($columns = "*", $table, $table2,  $joinCondition1, $table3, $joinCondition2) {
        global $koneksi;
        $query = "SELECT $columns FROM $table INNER JOIN $table2 ON $joinCondition1 INNER JOIN $table3 ON $joinCondition2";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    // format date
    function format($date, $format = 'd F Y') {
        return date($format, strtotime($date));
    }

    // show data by id
    function showDataById($table, $id) {
        global $koneksi;
        $query = mysqli_prepare($koneksi, "SELECT * FROM $table WHERE id = ?");
        mysqli_stmt_bind_param($query, 'i', $id);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $data = mysqli_fetch_assoc($result);
        mysqli_stmt_close($query);
        return $data;
    }

    // show enum
    function showEnum($table, $fields){
        global $koneksi;

        $result = mysqli_query($koneksi, "SHOW COLUMNS FROM $table LIKE '$fields'");
        $row = mysqli_fetch_assoc($result);

        $type = $row['Type'];

        // ambil isi pakai regex
        preg_match("/^enum\((.*)\)$/", $type, $matches);
        $enum = explode(",", $matches[1]);

        // bersihkan kutip dari tiap element
        $enum = array_map(function ($value) {
            return trim($value, "'");
        }, $enum);

        return $enum;
    }

    // delete by id
    function deleteById($table, $id) {
        global $koneksi;
        $query = mysqli_prepare($koneksi, "DELETE FROM $table WHERE id = ?");
        mysqli_stmt_bind_param($query, 'i', $id);   
        $result = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        return $result;
    }

    // update data
        function updateData($table, $data, $id) {
            global $koneksi;

            // ambil data
            $setClause = "";
            $type = "";
            $values = [];

            // tipe data
            foreach ($data as $key => $value) {
                $setClause .= "`$key` = ?,";
                if (is_int($value)) {
                    $type .= 'i';
                } elseif (is_float($value)){
                    $type .= 'd';
                } else {
                    $type .= 's';
                }
                $values[] = $value;
            }

            $setClause = rtrim($setClause, ", " );
            $type .= "i";
            $values[] = $id;

            $query = "UPDATE $table SET $setClause WHERE id = ?";
            $stmt = mysqli_prepare($koneksi, $query);

            if (!$stmt) {
                return ['success' => false, 'message' => 'gagal mengupdate data: ' . mysqli_error($koneksi)];
            }



            mysqli_stmt_bind_param($stmt, $type, ...$values);
            $success = mysqli_stmt_execute($stmt);
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            return ['success' => $success, 'message' => $error];
        }


?>