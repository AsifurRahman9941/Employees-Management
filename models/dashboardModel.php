<?php

include_once "libs/user.php";

class dashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {

        try {
            
            $query = $this->db->connect()->prepare(
               
                'INSERT INTO employees (name, email, city, state, postalCode, lastName, gender, streetAddress, age, phoneNumber)
            VALUES(:name, :email, :city, :state, :postalCode, :lastName, :gender, :streetAddress, :age, :phoneNumber)'
            );
          
            $query->execute([
                'name' => $data['name'],
                'email' => $data['email'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postalCode' => $data['postalCode'],
                'lastName' => $data['lastName'],
                'gender' => $data['gender'][0],
                'streetAddress' => $data['streetAddress'],
                'age' => $data['age'],
                'phoneNumber' => $data['phoneNumber']


            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    
    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query(
                'SELECT id,
                        name,
                        email,
                        age,
                        streetAddress,
                        city,
                        state,
                        postalCode,
                        phoneNumber
                FROM employees'
            );
            while ($row = $query->fetch()) {
                $item = [];
                $item['id'] = $row['id'];
                $item['name'] = $row['name'];
                $item['email'] = $row['email'];
                $item['age'] = $row['age'];
                $item['streetAddress'] = $row['streetAddress'];
                $item['city'] = $row['city'];
                $item['state'] = $row['state'];
                $item['postalCode'] = $row['postalCode'];
                $item['phoneNumber'] = $row['phoneNumber'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

  
    public function getById($userId)
    {
       
        $item = [];
       
        $query = $this->db->connect()->prepare("SELECT * FROM employees WHERE id=:id");
        try {
            $query->execute(['id' => $userId]);
           
            while ($row = $query->fetch()) {
                $item['id'] = $row['id'];
                $item['name'] = $row['name'];
                $item['lastName'] = $row['lastName'];
                $item['email'] = $row['email'];
                $item['age'] = $row['age'];
                $item['streetAddress'] = $row['streetAddress'];
                $item['city'] = $row['city'];
                $item['state'] = $row['state'];
                $item['postalCode'] = $row['postalCode'];
                $item['phoneNumber'] = $row['phoneNumber'];
            }
           
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function update($item)
    {
       
        $query = $this->db->connect()->prepare(
            "UPDATE employees SET 
            name='$item[name]', 
            email='$item[email]', 
            city='$item[city]', 
            state='$item[state]', 
            postalCode='$item[postalCode]', 
            lastName='$item[lastName]', 
            gender='$item[gender]', 
            streetAddress='$item[streetAddress]', 
            age='$item[age]', 
            phoneNumber='$item[phoneNumber]'
            WHERE id=$item[id]"
        );
        try {
            
            $query->execute();
            return true;
        } catch (PDOException $e) {
           
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
       
        $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id=:id");
        try {
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $e) {
          
            echo $e->getMessage();
            return false;
        }
    }
}
