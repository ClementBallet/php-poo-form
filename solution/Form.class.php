<?php
namespace Solution;

use \Solution\Champ;

class Form
{
    private string $formName;
    private string $formMethod;
    private string $formAction;
    private array  $tableauChamps;

    public function __construct(string $formName, string $formMethod, string $formAction)
    {
        $this->formName      = $formName;
        $this->formMethod    = $formMethod;
        $this->formAction    = $formAction;
        $this->tableauChamps = [];
    }

    public function ajouterChamp(string $inputType, string $inputName, string $label): array
    {
        $input = new Champ($inputType, $inputName, $label);
        $this->tableauChamps[] = $input->genererChamp();
        return $this->tableauChamps;
    }

    public function generer(): void
    {
        echo "<form name='$this->formName' method='$this->formMethod' action='$this->formAction'>";

        foreach ($this->tableauChamps as $champ)
        {
            echo "<p>";
            echo $champ;
            echo "</p>";
        }

        echo "</form>";
    }
}
