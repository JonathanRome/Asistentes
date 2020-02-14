import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { AdminLayoutRoutes } from './admin-layout.routing';

import { DashboardComponent }       from '../../pages/dashboard/dashboard.component';

import { TableComponent }           from '../../pages/table/table.component';


import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { RegistrarComponent } from '../../pages/registrar/registrar.component';
import { TrabajadorComponent } from '../../pages/trabajador/trabajador.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(AdminLayoutRoutes),
    FormsModule,
    NgbModule,
    ReactiveFormsModule
  ],
  declarations: [
    DashboardComponent,
   
    TableComponent,
    RegistrarComponent,
    TrabajadorComponent,
    
    
    
  
    
  ]
})

export class AdminLayoutModule {}
