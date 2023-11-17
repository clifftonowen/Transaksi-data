<?php

    require_once("database.php");
    require_once("BodyMassIndex.php");
    require_once("RelativeFatMass.php");

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Config {
        private $id;
        private $name;
        private $age;
        private $gender;
        private $height;
        private $weight;
        private $waist_size;
        private $bmi_score;
        private $bmi_category;
        private $rfm_score;
        private $rfm_category;
        protected $db;

        public function __construct($name="", $age=0, $gender="", $height=0, $weight=0, $waist_size=0, $bmi_score=0, $bmi_category="", $rfm_score=0, $rfm_category="")
        {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
            $this->height = $height;
            $this->weight = $weight;
            $this->waist_size = $waist_size;
            $this->bmi_score = $bmi_score;
            $this->bmi_category = $bmi_category;
            $this->rfm_score = $rfm_score;
            $this->rfm_category = $rfm_category;

            $this->db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setAge($age)
        {
            $this->age = $age;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        public function getGender()
        {
            return $this->gender;
        }

        public function setHeight($height)
        {
            $this->height = $height;
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function setWeight($weight)
        {
            $this->weight = $weight;
        }

        public function getWeight()
        {
            return $this->weight;
        }

        public function setWaistSize($waist_size)
        {
            $this->waist_size = $waist_size;
        }

        public function getWaistSize()
        {
            return $this->waist_size;
        }

        public function setBmiScore($bmi_score)
        {
            $this->bmi_score = $bmi_score;
        }

        public function getBmiScore()
        {
            return $this->bmi_score;
        }

        public function setBmiCategory($bmi_category)
        {
            $this->bmi_category = $bmi_category;
        }

        public function getBmiCategory()
        {
            return $this->bmi_category;
        }

        public function setRfmScore($rfm_score)
        {
            $this->rfm_score = $rfm_score;
        }

        public function getRfmScore()
        {
            return $this->rfm_score;
        }

        public function setRfmCategory($rfm_category)
        {
            $this->rfm_category = $rfm_category;
        }

        public function getRfmCategory()
        {
            return $this->rfm_category;
        }

        public function index()
        {
            try {
                $stm = $this->db->prepare("SELECT * FROM records");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData()
        {
            try {
                $stm = $this->db->prepare("INSERT INTO records(name, age, gender, height, weight, waist_size, bmi_score, bmi_category, rfm_score, rfm_category) values(?,?,?,?,?,?,?,?,?,?)");
                
                $bmi = new BodyMassIndex();
                $bmi->calculate($this->height, $this->weight);
                $bmi->determineCategory();

                $rfm = new RelativeFatMass();
                $rfm->calculate($this->height, $this->waist_size, $this->gender);
                $rfm->determineCategory();

                $this->bmi_score = $bmi->score;
                $this->bmi_category = $bmi->category;
                $this->rfm_score = $rfm->score;
                $this->rfm_category = $rfm->category;
                
                $stm->execute([
                    $this->name,
                    $this->age,
                    $this->gender,
                    $this->height,
                    $this->weight,
                    $this->waist_size,
                    $this->bmi_score,
                    $this->bmi_category,
                    $this->rfm_score,
                    $this->rfm_category
                ]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

       public function fetchOne()
       {
        try {
            $stm = $this->db->prepare("SELECT * FROM records WHERE ID=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
        public function update()
        {
            try {
                $stm = $this->db->prepare("UPDATE records SET name=?, age=?, gender=?, height=?, weight=?, waist_size=?, bmi_score=?, bmi_category=?, rfm_score=?, rfm_category=? WHERE id=?");
                $bmi = new BodyMassIndex();
                $bmi->calculate($this->height, $this->weight);
                $bmi->determineCategory();

                $rfm = new RelativeFatMass();
                $rfm->calculate($this->height, $this->waist_size, $this->gender);
                $rfm->determineCategory();

                $this->bmi_score = $bmi->score;
                $this->bmi_category = $bmi->category;
                $this->rfm_score = $rfm->score;
                $this->rfm_category = $rfm->category;
            
                $stm->execute([
                    $this->name,
                    $this->age,
                    $this->gender,
                    $this->height,
                    $this->weight,
                    $this->waist_size,
                    $this->bmi_score,
                    $this->bmi_category,
                    $this->rfm_score,
                    $this->rfm_category,
                    $this->id
                    
                ]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete()
        {
            try {
                $stm = $this->db->prepare("DELETE FROM records WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

?>