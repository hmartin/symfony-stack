<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page')
            ->setEntityLabelInPlural('Page')
            ->setSearchFields(['id', 'title', 'slug', 'content']);
    }

    public function configureFields(string $pageName): iterable
    {
        $title = TextField::new('title');
        $slug = TextField::new('slug');
        $content = TextareaField::new('content');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $title];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $title, $slug, $content];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$title, $slug, $content];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$title, $slug, $content];
        }
    }
}
