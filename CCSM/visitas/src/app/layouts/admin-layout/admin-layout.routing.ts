import { Routes } from '@angular/router';

import { DashboardComponent } from '../../pages/dashboard/dashboard.component';

import { TableComponent } from '../../pages/table/table.component';
import { RegistrarComponent } from '../../pages/registrar/registrar.component';
import { TrabajadorComponent } from 'app/pages/trabajador/trabajador.component';

export const AdminLayoutRoutes: Routes = [
    { path: 'dashboard',      component: DashboardComponent },
   
    { path: 'table',          component: TableComponent },
    { path: 'registrar',          component: RegistrarComponent },
    { path: 'trabajador',          component: TrabajadorComponent },
];
