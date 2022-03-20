import { Component, OnInit } from '@angular/core';
import { Ingredient } from '../interface/Ingredient';
import { ApiService } from '../services/api.service';
import { DataService, Message } from '../services/data.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {
  ingredients: Ingredient[];
  constructor(private data: DataService, private api: ApiService) {}

  ngOnInit() {}

  refresh(ev) {
    setTimeout(() => {
      ev.detail.complete();
    }, 3000);
  }

  getMessages(): Message[] {
    return this.data.getMessages();
  }

  setFilteredItems(input: string) {
    this.api.getIngredients(input).subscribe((data) => {
      this.ingredients = data['hydra:member'];
    });
  }
}
