<?php

class Orders
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new DbConnect();
        $this->db = $this->dbc->getDb();
    }


    /*ADMIN INSERTING Orders*/
    public function insertOrders($amount, $customer, $orderDate) {

        $query = "INSERT INTO orders(amount, customer, order_date) 
                  VALUES (:amount, :customer, :order_date)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':amount', $amount, PDO::PARAM_INT);
        $pdostmt->bindValue(':customer', $customer, PDO::PARAM_STR);
        $pdostmt->bindValue(':order_date', $orderDate);

        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $this->db->lastInsertId();

    }

    /*ADMIN INSERTING Orders*/
    public function insertOrderDetails($tourId, $orderId, $quantity, $cost) {

        $query = "INSERT INTO order_details(tour_id, order_id, quantity, cost) 
                  VALUES (:tourId, :orderId, :quantity, :cost)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':tourId', $tourId, PDO::PARAM_INT);
        $pdostmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
        $pdostmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $pdostmt->bindValue(':cost', $cost);
        $pdostmt->execute();
        $pdostmt->closeCursor();

    }

    /*Admin GETTING ALL ORDERS*/
    public function getOrders() {

            $query = "SELECT * FROM orders ORDER BY id DESC";
            $pdostmt = $this->db->prepare($query);
            $pdostmt->execute();
            $orders = $pdostmt->fetchAll(PDO::FETCH_OBJ);
            return $orders;


    }

    /*ADMIN DETAIL OF ORDER*/
    public function getOrderDetail($id){

        $query = "SELECT od.quantity, od.tour_id, od.cost, o.order_date, o.amount, o.customer, o.id, o.amount, t.name 
FROM orders o, order_details od , tours t
WHERE od.order_id= o.id
AND od.tour_id = t.id
  AND o.id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $orderDetail = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $orderDetail;

    }

    /*ADMIN ORDERS COUNT OF TOUR*/
    public function tourOrdersCount($id){

        $query = "SELECT COUNT(tour_id) AS counter FROM order_details WHERE tour_id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $tourCount = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $tourCount;

    }


}