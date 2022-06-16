import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  public appPages = [
    { title: 'Home', url: '/folder/Inbox'},
    { title: 'For Worker', url: '/worker'},
    { title: 'For Contractors', url: '/company'},
    { title: 'Company', url: '/folder/Favorites'},
    { title: 'Login', url: '/folder/Archived'},
  ];
  public labels = ['Family', 'Friends', 'Notes', 'Work', 'Travel', 'Reminders'];
  constructor() {}
}
