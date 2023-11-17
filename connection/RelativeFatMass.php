<?php

class RelativeFatMass
{
    public float $score = 0;
    public ?string $category = '';

    public function calculate($height, $waistSize, $gender) {
        if ($gender === 'male') {
            $rfm = 64 - 20 * ($height / $waistSize);
        } else {
            $rfm = 27 - 20 * ($height / $waistSize);
        }

        $this->score = $rfm;
    }

    public function determineCategory() : string {
        if ($this->score >= 2 && $this->score <= 5 ) {
            $this->category = 'Essential fat';
        } elseif ($this->score >= 6 AND $this->score <= 13) {
            $this->category = 'Athletes';
        } elseif ($this->score >= 14 AND $this->score <= 17) {
            $this->category = 'Fitness';
        } elseif ($this->score >= 18 AND $this->score <= 24) {
            $this->category = 'Average';
        } else {
            $this->category = 'Obese';
        }

        return $this->category;
    }
}

?>