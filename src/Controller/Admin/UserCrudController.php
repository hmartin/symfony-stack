<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('User')
            ->setSearchFields(['id', 'email', 'roles']);
    }

    public function configureFields(string $pageName): iterable
    {
        $email = TextField::new('email');
        $plainPassword = Field::new('plainPassword', 'password');
        $active = Field::new('active');
        $id = IntegerField::new('id', 'ID');
        $roles = TextField::new('roles');
        $password = TextField::new('password');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$email];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $email, $roles, $password];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$email, $plainPassword, $active];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$email, $plainPassword];
        }
    }
}
