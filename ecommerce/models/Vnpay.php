<?php
//models/Department.php
require_once 'models/Model.php';

class Vnpay extends Model
{


    public function insertVnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash)
    {
        $sql_insert = "INSERT INTO vnpay (`vnp_Amount`,`vnp_BankCode`,`vnp_BankTranNo`,`vnp_CardType`,`vnp_OrderInfo`,`vnp_PayDate`,`vnp_ResponseCode`,`vnp_TmnCode`,`vnp_TransactionNo`,`vnp_TransactionStatus`,`vnp_TxnRef`,`vnp_SecureHash`) VALUES (:vnp_Amount,:vnp_BankCode,:vnp_BankTranNo,:vnp_CardType,:vnp_OrderInfo,:vnp_PayDate,:vnp_ResponseCode,:vnp_TmnCode,:vnp_TransactionNo,:vnp_TransactionStatus,:vnp_TxnRef,:vnp_SecureHash)";
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':vnp_Amount' => $vnp_Amount,
            ':vnp_BankTranNo' => $vnp_BankTranNo,
            ':vnp_BankCode' => $vnp_BankCode,
            ':vnp_CardType' => $vnp_CardType,
            ':vnp_OrderInfo' => $vnp_OrderInfo,
            ':vnp_PayDate' => $vnp_PayDate,
            ':vnp_ResponseCode' => $vnp_ResponseCode,
            ':vnp_TmnCode' => $vnp_TmnCode,
            ':vnp_TransactionNo' => $vnp_TransactionNo,
            ':vnp_TransactionStatus' => $vnp_TransactionStatus,
            ':vnp_TxnRef' => $vnp_TxnRef,
            ':vnp_SecureHash' => $vnp_SecureHash,
        ];
        // B4: Thực thi
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM vnpay ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function getAll($page, $limit)
    {
        $sql_select_all = "SELECT * FROM vnpay  ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $vnpay = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $vnpay;
    }
    public function search($code_oder)
    {
        $sql_select_all = "SELECT * FROM vnpay WHERE vnp_TxnRef = :vnp_TxnRef ";
        $selects = [':vnp_TxnRef' => $code_oder];
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        $vnpay = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $vnpay;
    }
}
