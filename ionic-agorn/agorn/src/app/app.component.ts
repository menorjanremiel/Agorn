import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  public appPages = [
    { title: 'For Worker', url: '/folder/Inbox'},
    { title: 'For Contractors', url: '/folder/Outbox'},
    { title: 'Company', url: '/folder/Favorites'},
    { title: 'Login', url: '/folder/Archived'},
  ];
  public labels = ['Family', 'Friends', 'Notes', 'Work', 'Travel', 'Reminders'];
  constructor() {}
}
