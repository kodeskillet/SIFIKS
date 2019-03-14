 <!-- Content Header (Page header) -->
 @extends('admin.dashboard')
 @section('content')
 <section class="content-header">
      <h1>
        Obat
        <small>Info Seputar Obat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/administrator/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Obat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          <a href="/dokter/tambahArtikelDokter" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Tambah artikel</a>
            <!-- <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i clasbhbbs="fa fa-times"></i></button>
            </div> -->
          </div>
          <div class="box-body">
          <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Judul</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Deskripsi</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Picture</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd">
                    <td>1</td>
                    <td>Mark Zuckeberg</td>
                    <td>Pendiri Upnormal</td>
                    <td>A</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
                </div>
                  </div>
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                      </div>
                      <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                          <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example2_previous">
                              <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
                            </li>
                            <li class="paginate_button active">
                              <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button ">
                              <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                            </li>
                            <li class="paginate_button ">
                              <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
                            </li>
                            <li class="paginate_button ">
                              <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
                            </li>
                            <li class="paginate_button ">
                              <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
                            </li>
                            <li class="paginate_button ">
                              <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a>
                            </li>
                            <li class="paginate_button next" id="example2_next">
                              <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          <p>©2019 SIFIKS, Inc. · <a href="https://flying-coders.github.io/" __blank>About Us</a></p>
          </div>
          <!-- /.box-footer-->
        </div>

    </section>
    @endsection