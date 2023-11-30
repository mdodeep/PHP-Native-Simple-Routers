<?php
// Menentukan header untuk memastikan respons API berupa JSON
header('Content-Type: application/json');
// Membuat array sebagai contoh data yang akan dikirim atau diambil dari API
$data = array(
    1 => array(
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'johndoe@example.com'
    ),
    2 => array(
        'id' => 2,
        'name' => 'Jane Doe',
        'email' => 'janedoe@example.com'
    )
);

// Mengambil method HTTP yang digunakan untuk request
$method = $_SERVER['REQUEST_METHOD'];

// Memeriksa apakah request adalah GET atau POST
switch ($method) {
    case 'GET':
        // Jika method adalah GET, maka kita akan mengambil data dari API
        if (isset($url_parameter[2])) {
            // Jika parameter id disertakan, maka kita akan mengambil data dengan id tersebut
            $id = intval($url_parameter[2]);
            if (array_key_exists($id, $data)) {
                http_response_code(200); // Set status code 200 OK
                echo json_encode($data[$id]); // Mengembalikan data dalam format JSON
            } else {
                http_response_code(404); // Set status code 404 Not Found
                echo json_encode(array('message' => 'Data tidak ditemukan'));
            }
        } else {
            // Jika parameter id tidak disertakan, maka kita akan mengambil seluruh data
            http_response_code(200); // Set status code 200 OK
            echo json_encode($data); // Mengembalikan data dalam format JSON
        }
        break;
    case 'POST':
        // Jika method adalah POST, maka kita akan menambahkan data ke API
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id']) && isset($input['name']) && isset($input['email'])) {
            $id = intval($input['id']);
            $data[$id] = array(
                'id' => $id,
                'name' => $input['name'],
                'email' => $input['email']
            );
            http_response_code(200); // Set status code 200 OK
            echo json_encode(array('message' => 'Data berhasil ditambahkan'));
        } else {
            http_response_code(403); // Set status code 403 Forbidden
            echo json_encode(array('message' => 'Data tidak lengkap'));
        }
        break;
    default:
        http_response_code(405); // Set status code 405 Method Not Allowed
        echo json_encode(array('message' => 'Method tidak diizinkan'));
        break;
}
