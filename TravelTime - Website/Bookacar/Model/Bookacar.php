<?php

/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/5/2017
 * Time: 1:46 PM
 */
class Bookacar
{
    public $id;
    public $bookacar_id;
    public $pickup_loc;
    public $dropoff_loc;
    public $pickup_datetime;
    public $dropoff_datetime;
    public $name;
    public $email;
    public $phone;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBookacarId()
    {
        return $this->bookacar_id;
    }

    /**
     * @return mixed
     */
    public function getDropoffDatetime()
    {
        return $this->dropoff_datetime;
    }

    /**
     * @return mixed
     */
    public function getDropoffLoc()
    {
        return $this->dropoff_loc;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPickupDatetime()
    {
        return $this->pickup_datetime;
    }

    /**
     * @return mixed
     */
    public function getPickupLoc()
    {
        return $this->pickup_loc;
    }

    /**
     * @param mixed $bookacar_id
     */
    public function setBookacarId($bookacar_id)
    {
        $this->bookacar_id = $bookacar_id;
    }

    /**
     * @param mixed $dropoff_datetime
     */
    public function setDropoffDatetime($dropoff_datetime)
    {
        $this->dropoff_datetime = $dropoff_datetime;
    }

    /**
     * @param mixed $dropoff_loc
     */
    public function setDropoffLoc($dropoff_loc)
    {
        $this->dropoff_loc = $dropoff_loc;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $pickup_datetime
     */
    public function setPickupDatetime($pickup_datetime)
    {
        $this->pickup_datetime = $pickup_datetime;
    }

    /**
     * @param mixed $pickup_loc
     */
    public function setPickupLoc($pickup_loc)
    {
        $this->pickup_loc = $pickup_loc;
    }








}