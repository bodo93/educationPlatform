<?php

/**
 * Author: Bodo Grütter
 */

namespace database;

use model\Institute;
use model\InvoiceAddress;


class InstituteDAO extends BasicDAO {

     /**
     * $Author: Bodo Grütter
     * 
     * create($course) inserts a institute into database
     * parameter: a $institute object of the institute that should be inserted
     * return: the id of the last inserted data
     */
    public function create($institute) {
        $stmtInstitute = $this->mysqli->prepare("Insert into institute (ID, Name, Street, HouseNumber, PostCode, Place, Email, Password)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtInstitute->bind_param("isssisssi", Null, $institute->getName(), $institute->getStreet(), $institute->getHouseNumber(), $institute->getPostCode(), $institute->getPlace(), $institute->getEmail(), $institute->getPassword());
        $stmtInstitute.execute();
        
        return $this->readInstitute($this->mysqli->lastInsertId());
    }

     /**
     * $Author: Bodo Grütter
     * 
     * readInstitute($instituteId) reads a institute from database
     * parameter: the id of the institute that should be read
     * return: the institute object that has been read
     */
    public function readInstitute($instituteId) {
        $stmt = $this->mysql->prepare("Select * from institute where ID = ?");
        $stmt->bind_param("i", $instituteId);

        if ($stmt->execute()) {
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }

        return null;
    }

     /**
     * $Author: Bodo Grütter
     * 
     * update($institute) updates a institute from database
     * parameter: a $institute object of the institute that should be updated
     * return: the institute object that has been updated
     */
    public function update($institute) {     
        $stmtInstitute = $this->mysqli->prepare("Update invoiceAddress set Name = ?, Street = ?, HouseNumber = ?, PostCode = ?, Place = ?, Email = ?, Password = ? where ID = ?");
        $stmtInstitute->bind_param("sssisssi", $institute->getName(), $institute->getStreet(), $institute->getHouseNumber(), $institute->getPostCode(), $institute->getPlace(), $institute->getEmail(), $institute->getPassword(), $institute->getId());
        $stmtInstitute->execute();
    }
    
         /**
     * $Author: Bodo Grütter
     * 
     * updatePassword($institute) updates the password of an institute from database
     * parameter: an $institute object of the institute that should be updated
     * return: the institute object that has been updated
     */
    public function updatePassword($institute){
        $stmt = $this->mysqli->prepare("Update invoiceAddress set Password = ? where ID = ?");
        $stmt->bind_param("si", $institute->getPassword(), $institute->getId());
        $stmt->execute();
        
        return $this->readInstitute($this->mysqli->lastInsertId());
    }

     /**
     * $Author: Bodo Grütter
     * 
     * findByEmail($email) finds the institute by Email
     * parameter: the email of the corresponding institute
     * return: the institute object that has been found
     */
    public function findByEmail($email) {
        $stmt = $this->mysqli->prepare("Select * from institute where email = ?");
        $stmt->bindParam("s", $email);
        if($stmt->execute()){
             return $stmt->fetch_all($mysqli::fetch_object)[0];
        }
        
        return null;
    }

}
