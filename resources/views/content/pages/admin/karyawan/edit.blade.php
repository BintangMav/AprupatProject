

<!-- Page Scripts -->
<form action="{{ route('karyawan.update', $user->id) }}" method="POST">
  @csrf
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col mb-0">
        <label class="form-label">NIK</label>
        <input name="nik" type="name" class="form-control  @error('nik') is-invalid @enderror" placeholder="Masukan NIK" value="{{$user->nik}}">
        @error('nik')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col mb-0">
        <label class="form-label">Nama</label>
        <input name="nama" type="name" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama" value="{{$user->nama}}">
        @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </div>
    <div class="row mb-3">
      <div class="col mb-0">
        <label class="form-label">No. Telp</label>
        <input name="no_telp" type="name" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Masukan No. Telpon"value="{{$user->no_telp}}">
        @error('no_telp')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
      <div class="col mb-0">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" value="{{$user->email}}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </div>
    <div class="row mb-3">
      <div class="col mb-0">
        <label class="form-label">Username</label>
        <input name="username" type="name" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username" value="{{$user->username}}">
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
      <div class="col mb-0">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password" value="{{$user->password}}">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </div>
    <div class="row">
      <div class="col mb-3">
        <label for="selectpickerBasic" class="form-label">Jenis Kelamin</label>
        <select id="selectpickerBasic" name="jenis_kelamin" class="selectpicker w-100 @error('jenis_kelamin') is-invalid @enderror" data-style="btn-default">
          <option value="laki">Laki-Laki</option>
          <option value="perempuan">Perempuan</option>
        </select>
        @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
      <div class="col mb-3">
        <label for="selectpickerBasic" class="form-label">Status Jabatan</label>
        <select id="selectpickerBasic" name="status_jabatan" class="selectpicker w-100 @error('status_jabatan') is-invalid @enderror" data-style="btn-default">
          <option value="Direksi">Direksi</option>
          <option value="Manager">Manager</option>
          <option value="Staff">Staff</option>
        </select>
        @error('status_jabatan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
      <div class="col mb-3">
        <label for="selectpickerBasic" class="form-label">Jabatan</label>
        <select id="selectpickerBasic" name="id_jabatan" class="selectpicker w-100 @error('id_jabatan') is-invalid @enderror" data-style="btn-default">
          @foreach ($jabatan as $item)
          <option value="{{$item->id}}">{{$item->nama_jabatan}}</option>
          @endforeach
        </select>
        @error('id_jabatan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
      <div>
        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Alamat..." value="{{$user->alamat}}"></textarea>
        @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Keluar</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
