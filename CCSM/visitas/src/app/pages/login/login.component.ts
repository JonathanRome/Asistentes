import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  private dataC: FormGroup;
  constructor(private router: Router) {
    this.dataC = new FormGroup({
      cedula: new FormControl('', Validators.required),
    });
  }

  ngOnInit() {
  }

  login() {
    alert('logiado ' + this.dataC.value.cedula);
    this.router.navigateByUrl("/registrar");
  }
}
