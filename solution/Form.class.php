<?php
namespace Solution;

use \Solution\Champ;

class Form
{
    private string $nameAttr;
    private string $methodAttr;
    private string $actionAttr;
    private array $tableauChamps;

    public function __construct(string $nameAttr, string $methodAttr, string $actionAttr)
    {
        $this->nameAttr = $nameAttr;
        $this->methodAttr = $methodAttr;
        $this->actionAttr = $actionAttr;
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
        echo "<form name='$this->nameAttr' method='$this->methodAttr' action='$this->actionAttr'>";

        foreach ($this->tableauChamps as $champ)
        {
            echo "<p>";
            echo $champ;
            echo "</p>";
        }

        echo "</form>";
    }
}
