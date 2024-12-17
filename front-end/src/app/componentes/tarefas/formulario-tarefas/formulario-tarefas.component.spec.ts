import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormularioTarefasComponent } from './formulario-tarefas.component';

describe('FormularioTarefasComponent', () => {
  let component: FormularioTarefasComponent;
  let fixture: ComponentFixture<FormularioTarefasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FormularioTarefasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormularioTarefasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
