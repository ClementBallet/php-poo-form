<?php
namespace Solution;

class Form
{
    private string $formName;
    private string $formMethod;
    private string $formAction;
    private array  $tableauChamps;

    /**
     * Classe Form qui génère un formulaire
     * @param string $formName Attribut name du formulaire
     * @param string $formMethod Méthode du formulaire (get ou post)
     * @param string $formAction Page de traitement du formulaire
     */
    public function __construct(string $formName, string $formMethod, string $formAction)
    {
        $this->formName      = $formName;
        $this->formMethod    = $formMethod;
        $this->formAction    = $formAction;
        $this->tableauChamps = [];
    }

    /**
     * Ajoute un champ de n'importe quel type, au choix de l'utilisateur.
     * Chaque champ est constitué du <label> et de son <input>.
     * @param string $inputType Type du champ input (text, number, etc...)
     * @param string $inputName Attribut name de l'input
     * @param string $label Texte du <label> associé à l'input
     * @return array Retourne tous les champs compilés dans un tableau
     */
    public function ajouterChamp(string $inputType, string $inputName, string $label): array
    {
        $input = new Champ($inputType, $inputName, $label);
        $this->tableauChamps[] = $input->genererChamp();
        return $this->tableauChamps;
    }

    /**
     * Génère tout le formulaire
     * @return string Retourne toute la structure HTML du formulaire dans une chaine de caractères
     */
    public function generer(): string
    {
        $form = "<form name='$this->formName' method='$this->formMethod' action='$this->formAction'>";

        foreach ($this->tableauChamps as $champ)
        {
            $form .= "<p>";
            $form .= $champ;
            $form .= "</p>";
        }

        $form .= "</form>";
        return $form;
    }
}
