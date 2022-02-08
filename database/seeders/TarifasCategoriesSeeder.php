<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TarifasCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('categories')->insert([
      INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (1, 'Dias de Pago', 'pagos', '2022-01-27 11:43:13', '2022-01-27 11:43:14');
      INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (2, 'Reunion', 'reuniones', '2022-01-27 11:43:58', '2022-01-27 11:43:59');
      INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (3, 'Reclamo', 'reclamos', '2022-01-27 18:30:32', '2022-01-27 18:30:32');
      INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (4, 'Sugerencia', 'sugerencias', '2022-01-27 18:31:06', '2022-01-27 18:31:07');

      INSERT INTO `tmultas` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (1, 'Multa por inasistencia a reunion', 20.00, NULL, NULL);
      INSERT INTO `tmultas` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (2, 'Multa por retraso en el pago de consumo', 15.00, NULL, NULL);
      INSERT INTO `tmultas` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (3, 'Multa por Reconexion', 5.00, NULL, NULL);

      INSERT INTO `tconsumos` (`id`, `descripcion`, `cubos_ini`, `cubos_fin`, `monto`, `created_at`, `updated_at`) VALUES (1, 'Tarifa Basica', 0, 15, 15.00, NULL, NULL);
      INSERT INTO `tconsumos` (`id`, `descripcion`, `cubos_ini`, `cubos_fin`, `monto`, `created_at`, `updated_at`) VALUES (2, 'Tarifa Variable (por exedente)', 0, 1, 3.00, NULL, NULL);

      INSERT INTO `taportes` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (1, 'S.A.P. y O.T.B.', 2.00, '2022-02-01 03:00:07', '2022-02-01 03:00:10');
      INSERT INTO `taportes` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (2, 'Descuentos', 10.00, '2022-02-01 03:00:57', '2022-02-01 03:00:59');
      INSERT INTO `taportes` (`id`, `descripcion`, `monto`, `created_at`, `updated_at`) VALUES (3, 'Otros', 0.00, '2022-02-01 03:01:25', '2022-02-01 03:01:26');

    }
}
