<?php
    function delete($id) {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "DELETE FROM color WHERE id = $id";
        return mysqli_query($conn, $sql);
    }

    function update($id, $title, $code) {
        global $conn;
        $title = mysqli_real_escape_string($conn, $title);
        $code = mysqli_real_escape_string($conn, $code);
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "UPDATE color SET title = '$title', code = '$code' WHERE id = $id"; 
        return mysqli_query($conn, $sql);
    }

    function add($title, $code) {
        global $conn;
        $title = mysqli_real_escape_string($conn, $title);
        $code = mysqli_real_escape_string($conn, $code);

        $sql = "INSERT INTO color (title, code) VALUES ('$title', '$code')";
        return mysqli_query($conn, $sql);
    }