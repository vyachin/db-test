import {Component, OnInit} from '@angular/core';
import {DataService} from "../services/data.service";
import {Data} from "../entities/data.entity";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  public page: number = 1;
  public perPage: number = 5;
  public pageCount: number = 0;
  public totalCount: number = 0;
  public dataList: Data[] = [];

  public loading = true;

  constructor(private service: DataService) {
  }

  prevPage() {
    this.page--;
    this.refreshData()
  }

  nextPage() {
    this.page++;
    this.refreshData()
  }

  refreshData() {
    this.loading = true;
    this.service.getAllData(this.page, this.perPage).subscribe((response) => {
      this.page = parseInt(response.headers.get('x-pagination-current-page') || '');
      this.pageCount = parseInt(response.headers.get('x-pagination-page-count') || '');
      this.perPage = parseInt(response.headers.get('x-pagination-per-page') || '');
      this.totalCount = parseInt(response.headers.get('x-pagination-total-count') || '');
      this.dataList = response.body || [];
      this.loading = false;
    })
  }

  onChangePerPage(value: any) {
    this.perPage = value.target.value
    this.refreshData()
  }

  ngOnInit(): void {
    this.refreshData()
  }
}
