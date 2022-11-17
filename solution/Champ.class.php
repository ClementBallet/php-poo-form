<?php
namespace Solution;

class Champ
{
    private string $inputType;
    private string $inputName;
    private string $label;

    /**
     * Classe Champ qui génère chaque champ du formulaire.
     * Chaque champ est constitué du <label> et de son <input>.
     * @param string $inputType Type du champ input (text, number, etc...)
     * @param string $inputName Attribut name de l'input
     * @param string $label Texte du <label> associé à l'input
     */
    public function __construct(string $inputType, string $inputName, string $label)
    {
        $this->inputType = $inputType;
        $this->inputName = $inputName;
        $this->label     = $label;
    }

    /**
     * Génère le <label>.
     * @return string Retourne l'élément HTML <label>
     */
    private function genererLabel(): string
    {
        return "<label for='$this->inputName'>$this->label</label>";
    }

    /**
     * Génère le <input>.
     * @return string Retourne l'élément HTML <input>
     */
    private function genererInput(): string
    {
        return "<input type='$this->inputType' id='$this->inputName' name='$this->inputName'>";
    }

    /**
     * Génère chaque champ avec le <label> et <input>
     * @return string
     */
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
