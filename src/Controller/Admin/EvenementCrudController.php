<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('validevenement'),
            TextField::new('titre'),

            TextField::new('lieu'),
            DateField::new('dateEvenement'),
            TextField::new('description'),
            NumberField::new('prix'),
            ImageField::new('image')->setFormType(FileUploadType::class)
                ->setBasePath('/dossierIamge/')
                ->setUploadDir('public/dossierIamge/')
                ->setUploadedFileNamePattern('evenet' . uniqid() . '.jpg'),





        ];
    }
}
