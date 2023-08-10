export interface DataProvider<T> {
    rows: T[];
    totalCount: number;
    pageCount: number;
    currentPage: number;
    perPage: number;
}
