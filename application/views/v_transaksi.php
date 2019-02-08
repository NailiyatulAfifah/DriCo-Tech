<br><br><h2 align="center">Halaman Transaksi</h2> <br><br>
<div class="col-md-6">
	<table id="example" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Tipe</th>
				<th>Jenis</th>
				<th>Tahun</th>
				<th>Stok</th>
				<th>Aksi</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach($tampil_mobil as $mobil): $no++; ?>
			<tr>
				<td><?= $mobil->kode_mobil ?></td>
				<td><?= $mobil->tipe_mobil ?></td>
				<td><?= $mobil->jenis ?></td>
				<td><?= $mobil->tahun ?></td>
				<td><?= $mobil->stok ?></td>
				<?php if($mobil->stok>0): ?>
				<td><a href="<?=base_url('index.php/transaksi/addcart/'.$mobil->kode_mobil)?>" class="btn btn-info">Pesan</a></td>
			<?php elseif($mobil->stok==0): ?>
				<td><button type="button" class="btn btn-danger" data-toggle="popover" data-content="Stok habis, segera hubungi admin">Habis</button></td>
			<?php endif ?>
				<td><?= $mobil->harga ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="col-md-6">
	<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
		<a href="<?=base_url('index.php/transaksi/clearcart')?>" class="btn btn-danger">Clear Cart</a>
		Nama Pembeli : <input type="text" name="pembeli" class="form-control" style="display: inline-block;width:200px"><br>
		<input type="hidden" name="username" class="form-control" value="<?= $this->session->userdata('username'); ?>" style="display: inline-block;width:200px"><br>
		<table class="table table-striped table-hover" blocked>
			<tr>
				<th>No</th>
				<th>Cars Type</th>
				<th>QTY</th>
				<th>Harga</th>
				<th>Price</th>
				<th>Aksi</th>
			</tr>
				<?php $no=0; foreach($this->cart->contents() as $items): $no++; ?>
				<input type="hidden" name="kode_mobil[]" value="<?=$items['id']?>">
				<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
			<tr>
				<td><?=$no?></td>
				<td><?=$items['name']?></td>
				<td width="2"><input type="number" required name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding: 4px;width: 47px"></td>
				<td><?=number_format($items['price'])?></td>
				<td><?=number_format($items['subtotal'])?></td>
				<td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger">&times;</a></td>
			</tr>
			<?php endforeach ?>
			<input type="hidden" name="total_harga" value="<?=$this->cart->total()?>">
			<tr style="border-bottom:5px black solid">
				<th colspan="4">Total Price</th>
				<th><?= number_format($this->cart->total()) ?></th>
				<th></th>
			</tr>
			<tr>
				<th colspan="4">Bayar</th>
				<th><input type="number" name="uang_bayar" class="form-control" style="display: inline-block;width:200px"></th>
				<th></th>
			</tr>
		</table>
		<input type="submit" name="update" class="btn btn-success" value="Update QTY"> 
		<input required type="submit" name="bayar" onclick="return confirm('Are you sure?')" class="btn btn-warning" value="Bayar">
	</form>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>
</div>