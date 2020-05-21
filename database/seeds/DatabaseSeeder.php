<?php

use App\User;
use App\iuElement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Javier Alejandro',
            'lastname' => 'Lopez Rangel',
            'code' => '215256109',
            'gender' => 'M',
            'email' => 'javier.lopez@alumnos.udg.mx',
            'phone' => null,
            'password' => Hash::make('secret'),
            'userType' => User::USUARIO_ADMIN,
            'institution_id' => 1
        ]);

        User::create([
            'name' => 'Jesus Martin',
            'lastname' => 'Olarte Ramirez',
            'code' => '214519971',
            'gender' => 'M',
            'email' => 'jesus.olarte@alumnos.udg.mx',
            'phone' => null,
            'password' => Hash::make('secret'),
            'userType' => User::USUARIO_ADMIN,
            'institution_id' => 1
        ]);

        User::create([
            'name' => 'Jose Antonio',
            'lastname' => 'Mederos Gomez',
            'code' => '210637236',
            'gender' => 'M',
            'email' => 'jose.mederos@alumnos.udg.mx',
            'phone' => null,
            'password' => Hash::make('secret'),
            'userType' => User::USUARIO_ADMIN,
            'institution_id' => 1
        ]);

        /*********************** VISTAS PARA USUARIOS REGULARES  **********************************/

        iuElement::create([
            'element' => 'FilesView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'ReportsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'SchedulariesView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'InstitutionsView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'LaboratoriesView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'ItemsView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'NotesView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'UsersView',
            'canEdit' => 0,
            'canView' => 0,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'ReportFieldsView',
            'canEdit' => 0,
            'canView' => 1,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'DictionaryView',
            'canEdit' => 0,
            'canView' => 0,
            'userType' => User::USUARIO_REGULAR
        ]);

        iuElement::create([
            'element' => 'iuElementsView',
            'canEdit' => 0,
            'canView' => 0,
            'userType' => User::USUARIO_REGULAR
        ]);

        /*********************** VISTAS PARA ADMINISTRADOR  **********************************/

        iuElement::create([
            'element' => 'FilesView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'ReportsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'SchedulariesView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'InstitutionsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'LaboratoriesView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'ItemsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'NotesView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'UsersView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'ReportFieldsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'DictionaryView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);

        iuElement::create([
            'element' => 'iuElementsView',
            'canEdit' => 1,
            'canView' => 1,
            'userType' => User::USUARIO_ADMIN
        ]);
    }
}
