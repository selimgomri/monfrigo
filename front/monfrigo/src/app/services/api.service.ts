import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class ApiService {
  constructor(private http: HttpClient) {}

  getIngredients(ingredient: any): Observable<any> {
    const $url = 'https://localhost:8000/api/ingredients?name=';
    return this.http.get<any>($url + ingredient);
  }

  getRecipes(): Observable<any> {
    const $url = 'https://localhost:8000/api/recipes';
    return this.http.get<any>($url);
  }

  getOneRecipe(id: string): Observable<any> {
    const $url = `https://localhost:8000/api/recipes/${id}`;
    return this.http.get<any>($url);
  }
}
