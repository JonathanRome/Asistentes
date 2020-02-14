import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-registrar',
  templateUrl: './registrar.component.html',
  styleUrls: ['./registrar.component.scss']
})
export class RegistrarComponent implements OnInit {

  // @ViewChild("video")
  video: ElementRef;

  // @ViewChild("canvas")
  canvas: ElementRef;



  public captures: Array<any>;

 data: FormGroup;

  constructor() {
    this.captures = [];

    this.data = new FormGroup({
      nombre: new FormControl('', Validators.required),
      cedula: new FormControl('', Validators.required),
      id_carnet: new FormControl('', Validators.required),
      visitar_a: new FormControl('', Validators.required)
    });
  }

 

  public ngOnInit() { }

  public ngAfterViewInit() {
      if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        
          navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
              this.video.nativeElement.src = window.URL.createObjectURL(stream);
              this.video.nativeElement.play();
          });
      }
  }

  public capture() {
      var context = this.canvas.nativeElement.getContext("2d").drawImage(this.video.nativeElement, 0, 0, 640, 480);
      this.captures.push(this.canvas.nativeElement.toDataURL("image/png"));
  }
  registrar() {
    alert('visitar a ' + this.data.value.visitar_a);
  }

}
