<?php
final class Calculate_CubeSummation extends Template {

    //--Class Constants--//
    const MATRIX_DIMENSIONS = 3;

    //--Class Properties--//
    private $_input;
    private $_testCases;
    private $_dimensions;
    private $_operations;
    private $_matrix;
    private $_elements;
    private $_output;

    public function __construct() {
        parent::__construct("calculate_cubesummation");
        $this->_input = "";
        $this->_testCases = 0;
        $this->_dimensions = 0;
        $this->_operations = 0;
        $this->_matrix = array();
        $this->_elements = 0;
        $this->_output = array();
    }

    private function setErrorMessage($message) {
        $this->assign("errorMessage", $message);
    }

    public function parseTestCases($args) {
        if(empty($args["taInputData"])) {
            $this->setErrorMessage("No Data!");
            return false;
        }
        $this->_input = str_replace("\r", "", $args["taInputData"]);
        sscanf($this->_input, "%d", $this->_testCases);
        if(!AppValidation::isTestCasesValidated($this->_testCases)) {
            $this->setErrorMessage("Test-Cases {$this->_testCases} Is Invalid!");
            return false;
        }
        return true;
    }

    public function processTestCases() {
        $data = explode("\n", $this->_input);
        for($t = 0, $index = 1; $t < $this->_testCases; $t++) {
            sscanf($data[$index], "%d %d", $this->_dimensions, $this->_operations);
            if(!$this->validateInitData())
                break;
            if(!$this->parseOperations($data, ++$index))
                break;
            $index += $this->_operations;
        }
        $this->assign("input", $this->_input);
        $this->assign("output", implode("\n", $this->_output));
    }

    private function validateInitData() {
        if(!AppValidation::isMatrixDimensionsValidated($this->_dimensions)) {
            $this->setErrorMessage("Matrix Dimension {$this->_dimensions} Is Invalid!");
            return false;
        }
        if(!AppValidation::isNumberOfOperationsValidated($this->_operations)) {
            $this->setErrorMessage("Number Of Operations {$this->_operations} Is Invalid!");
            return false;
        }
        return true;
    }

    private function parseOperations($data, $index) {
        $this->initializeMatrix();
        for($m = 0; $m < $this->_operations; $m++) {
            $string = $data[$index + $m];
            $result = false;
            if(strncasecmp("update", $string, 6) === 0)
                $result = $this->update($string);
            elseif(strncasecmp("query", $string, 5) === 0)
                $result = $this->query($string);
            else
                $this->setErrorMessage("Operation Unknown: $string");
            if(!$result)
                return false;
        }
        return true;
    }

    private function initializeMatrix() {
        $this->_matrix = array();
        $this->_elements = pow($this->_dimensions, self::MATRIX_DIMENSIONS);
        for($n = 0; $n < $this->_elements; $n++)
            $this->_matrix[$n] = 0;
    }

    private function getIndexMatrix($x, $y, $z) {
        $index = $this->_elements / $this->_dimensions * ($x - 1) - 1;
        $index += $this->_dimensions * ($y - 1);
        $index += $z;
        return $index;
    }

    private function update($string) {
        sscanf($string, "%6s %d %d %d %d", $m, $x, $y, $z, $value);
        if($this->validateUpdate($x, $y, $z, $value)) {
            $index = $this->getIndexMatrix($x, $y, $z);
            $this->_matrix[$index] = $value;
            return true;
        }
        return false;
    }

    private function validateUpdate($x, $y, $z, $value) {
        if(!AppValidation::isCellValidated($x, $y, $z, $this->_dimensions)) {
            $this->setErrorMessage("Cell $x,$y,$z Not Exists!");
            return false;
        }
        if(!AppValidation::isElementValidated($value)) {
            $this->setErrorMessage("Value $value Is Invalid!");
            return false;
        }
        return true;
    }

    private function query($string) {
        sscanf($string, "%5s %d %d %d %d %d %d", $m, $x1, $y1, $z1, $x2, $y2, $z2);
        if($this->validateQuery($x1, $y1, $z1, $x2, $y2, $z2)) {
            $sum = 0;
            for($x = $x1, $y = $y1, $z = $z1; $x <= $x2; ) {
                $index = $this->getIndexMatrix($x, $y, $z);
                $sum += $this->_matrix[$index];
                $z = $z % $z2 + 1;
                if($z == 1)
                    $y = $y % $y2 + 1;
                if($z == 1 && $y == 1)
                    $x++;
            }
            $this->_output[] = $sum;
            return true;
        }
        return false;
    }

    private function validateQuery($x1, $y1, $z1, $x2, $y2, $z2) {
        if(!AppValidation::isCellValidated($x2, $y2, $z2, $this->_dimensions)) {
            $this->setErrorMessage("Cell $x,$y,$z Not Exists!");
            return false;
        }
        if(!AppValidation::isIndexValidated($x1, $x2)) {
            $this->setErrorMessage("x1=$x1 Is Out Of Range!");
            return false;
        }
        if(!AppValidation::isIndexValidated($y1, $y2)) {
            $this->setErrorMessage("y1=$y1 Is Out Of Range!");
            return false;
        }
        if(!AppValidation::isIndexValidated($z1, $z2)) {
            $this->setErrorMessage("z1=$z1 Is Out Of Range!");
            return false;
        }
        return true;
    }
}
?>