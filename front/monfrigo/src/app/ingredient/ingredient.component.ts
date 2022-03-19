import { Ingredient } from './../interface/Ingredient';
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../services/api.service';

@Component({
  selector: 'app-ingredient',
  templateUrl: './ingredient.component.html',
  styleUrls: ['./ingredient.component.scss'],
})
export class IngredientComponent implements OnInit {
  ingredients: Ingredient;

  constructor(private api: ApiService) {}

  ngOnInit() {
    this.api.getIngredients('p').subscribe((data) => {
      this.ingredients = data['hydra:member'];
      console.log(this.ingredients);
    });
  }
}
