
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { RemoveFavoritePage } from './remove-favorite.page';

describe('RemoveFavoritePage', () => {
  let component: RemoveFavoritePage;
  let fixture: ComponentFixture<RemoveFavoritePage>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [RemoveFavoritePage],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(RemoveFavoritePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
