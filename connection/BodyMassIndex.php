<?php

class BodyMassIndex
{
    public float $score = 0;
    public ?string $category = '';

    // Method calculate
    public function calculate($height, $weight) : void {
        $bmi = $weight / (($height / 100) ** 2);
        $this->score = $bmi;
    }

    public function determineCategory() {
        if ($this->score < 16.0) {
            $this->category = 'Underweight (Severe thinness)';
        } elseif ($this->score >= 16.0 && $this->score <= 16.9) {
            $this->category = 'Underweight (Moderate thinness)';
        } elseif ($this->score >= 17.0 && $this->score <= 18.4) {
            $this->category = 'Underweight (Mild thinness)';
        } elseif ($this->score >= 18.5 && $this->score <= 24.9) {
            $this->category = 'Normal range';
        } elseif ($this->score >= 25.0 && $this->score <= 29.9) {
            $this->category = 'Overweight (Pre-obese)';
        } elseif ($this->score >= 30.0 && $this->score <= 34.9) {
            $this->category = 'Obese (Class I)';
        } elseif ($this->score >= 35.0 && $this->score <= 39.9) {
            $this->category = 'Obese (Class II)';
        } else {
            $this->category = 'Obese (Class III)';
        }
    }
}


?>