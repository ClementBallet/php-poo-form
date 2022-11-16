<?php
namespace Solution;

class Champ
{
    private string $inputType;
    private string $inputName;
    private string $label;

    public function __construct(string $inputType, string $inputName, string $label)
    {
        $this->inputType = $inputType;
        $this->inputName = $inputName;
        $this->label     = $label;
    }

    private function genererLabel(): string
    {
        return "<label for='$this->inputName'>$this->label</label>";
    }

    private function genererInput(): string
    {
        return "<input type='$this->inputType' id='$this->inputName' name='$this->inputName'>";
    }

    public function genererChamp(): string
    {
        $champs = "";

        if ($this->inputType !== "submit")
        {
            $champs .= $this->genererLabel();
        }

        $champs .= $this->genererInput();
        return $champs;
    }
}
