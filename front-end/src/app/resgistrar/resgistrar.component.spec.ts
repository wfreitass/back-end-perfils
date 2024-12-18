import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ResgistrarComponent } from './resgistrar.component';

describe('ResgistrarComponent', () => {
  let component: ResgistrarComponent;
  let fixture: ComponentFixture<ResgistrarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ResgistrarComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ResgistrarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
