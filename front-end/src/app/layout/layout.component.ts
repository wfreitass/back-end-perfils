import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../service/auth.service';


@Component({
  selector: 'app-layout',
  standalone: false,

  templateUrl: './layout.component.html',
  styleUrl: './layout.component.scss'
})
export class LayoutComponent {
  @Input() pageTitle: string = '';

  username: string = '';

  constructor(private router: Router,
    private authService: AuthService
  ) { }

  ngOnInit() {
    const user = localStorage.getItem('user');
    if (user) {
      this.username = JSON.parse(user).name;
    } else {
      this.router.navigate(['/login']);
    }
  }

  logout(): void {
    this.authService.logout();
  }
}
