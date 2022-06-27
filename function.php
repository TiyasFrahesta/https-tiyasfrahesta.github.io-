<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "transaksi2");

function querytsales()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM t_sales");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function login()
// {
//     global $conn;
//     global $username;
//     global $password;
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $result = mysqli_query($conn, "SELECT * FROM m_login WHERE username = '$username' AND password = '$password'");
//     $row = mysqli_fetch_assoc($result);
//     if ($row['username'] == $username && $row['password'] == $password) {
//         $_SESSION['username'] = $username;
//         $_SESSION['status'] = "login";
//         header("location: index.php");
//     } else {
//         echo "
//             <script>
//                 alert('Username atau Password salah!');
//                 document.location.href = 'login.php';
//             </script>
//         ";
//     }
// }
// query sales
function querySales_det()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM t_sales_det");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// tambah t_sales


// query customer

// submit customer

// submit
function tambah($data) {
    global $conn;
    $kode = htmlspecialchars( $data['kode']);
    $nama = htmlspecialchars( $data['nama']);
    $harga = htmlspecialchars( $data['harga']);
    $query = "INSERT INTO m_barang VALUES ('','$kode', '$nama', '$harga')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}
 function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM m_barang WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// logout
function logout() {
    session_destroy();
    header("location: login.php");
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function ubah($data) {
    global $conn;
    $id = $data['id'];
    $kode = htmlspecialchars( $data['kode']);
    $nama = htmlspecialchars( $data['nama']);
    $harga = htmlspecialchars( $data['harga']);
    $query = "UPDATE m_barang SET kode = '$kode', nama = '$nama', harga = '$harga' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function querycustomer($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapusCustomer($idcust)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM m_customer WHERE id = $idcust");
    return mysqli_affected_rows($conn);
}
function tambahcustomer($data)
{
    global $conn;
    $kodecust = $data['kode_cust'];
    $name = $data['name'];
    $telp = $data['telp'];
    $query = "INSERT INTO m_customer VALUES ('',  '$kodecust','$name', '$telp')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function querySales($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// // insert t_sales_det
// function tambahSales_det($sales)
// {
//     global $conn;
//     $salesid = $sales['sales_id'];
//     $barangid = $sales['barang_id'];
//     $harga_bandrol = $sales['harga_bandrol'];
//     $qty = $sales['qty'];
//     $diskonpct = $sales['diskon_pct'];
//     $diskonrp = $sales['diskon_rp'];
//     $diskonrp = $diskonpct * $harga_bandrol / 100;
//     $harga_diskon = $sales['harga_diskon'];
//     $harga_diskon = $harga_bandrol - $diskonrp;
//     $total = $sales['total'];
//     $total = $harga_diskon * $qty;
//     $query = "INSERT INTO t_sales_det VALUES ('', '$salesid', '$barangid', '$harga_bandrol', '$qty', '$diskonpct', '$diskonrp', '$harga_diskon', '$total')";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
//     if ($query) {
//         echo "
//             <script>
//                 alert ('Data berhasil ditambah');
//                 document.location.href = 'inputTransaksi.php';
//             </script>
//         ";
//     } else {
//         echo "
//             <script>
//                 alert('Data gagal ditambah');
//                 document.location.href = 'inputTransaksi.php';
//             </script>
//         ";
//     }
// }

// tambaht_sales_det
function tambahSales_det($data)
{
    global $conn;
   
    $kodebarang = $data['kode_barang'];
    $namabarang = $data['nama'];
    $harga_bandrol = $data['harga_bandrol'];
    $qty = $data['qty'];
    $diskonpct = $data['diskon_pct'];
    $nilai_diskon = $data['diskon_nilai'];
    $harga_diskon = $data['harga_diskon'];
    $total = $data['total'];
    $query = "INSERT INTO t_sales_det VALUES ('','$kodebarang', '$namabarang',  '$harga_bandrol', '$qty', '$diskonpct', '$nilai_diskon', '$harga_diskon', '$total')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) ;
        if ($query) {
        echo "
            <script>
                alert ('Data berhasil ditambah');
                document.location.href = 'inputTransaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambah');
                document.location.href = 'inputTransaksi.php';
            </script>
        ";
    }
}   
function deletetransaksi($id)
{
    global $conn;
    mysqli_query($conn, "SELECT * FROM m_customer, t_sales WHERE m_customer.id = t_sales.cust_id");
    return mysqli_affected_rows($conn);
}

