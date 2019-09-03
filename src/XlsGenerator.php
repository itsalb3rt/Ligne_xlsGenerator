<?php
/**
 * Genera archivos XLS a partir de una coleccion de datos
 *
 * Creado por Albert Eduardo Hidalgo Taveras
 * Github: https://github.com/itsalb3rt
 */

namespace Ligne;


class XlsGenerator
{
    private $downloable;
    private $omit_fields = array();
    private $content;
    private $hasHeader;
    private $arrayHeaders = array();
    private $arrayBody = array();

    //Construccion de la tabla
    private $tableOpen = '<table border="1">';
    private $tbodyOpen = '<tbody>';
    private $tbodyclose = '</tbody>';
    private $theadOpen = '<thead>';
    private $theadClose = '</thead>';

    private $trOpen = '<tr>';
    private $trClose = '</tr>';

    private $thOpen = '<th>';
    private $thClose = '</th>';

    private $tdOpen = '<td>';
    private $tdClose = '</td>';

    private $tableClose = '</table>';

    private $table_body = null;
    private $table_header = null;

    public function __construct(array $content,
                                array $omit_fields = array(),
                                bool $downloable = false,
                                bool $hasHeader = true)
    {
        $this->content = $content;
        $this->omit_fields = $omit_fields;
        $this->downloable = $downloable;
        $this->hasHeader = $hasHeader;
    }

    public function getXls(){
        $this->table_body = null;
        $this->table_header = null;

        $this->table_body .=  $this->tbodyOpen;
        $this->table_header .= $this->theadOpen . $this->trOpen;

        foreach ($this->content as $key => $value) {
            $this->table_body .=  $this->trOpen;

            foreach ($value as $field_name => $field_value) {

                //Creando los encabezados
                if($this->hasHeader){
                    if($key == 0 && !in_array($field_name,$this->omit_fields)){
                        $this->table_header .= $this->tdOpen . $field_name . $this->tdClose ;
                    }
                }
                //Creando el cuerpo de la tabla
                if(!in_array($field_name,$this->omit_fields)){
                    $this->table_body .=  $this->tdOpen . $field_value  . $this->tdClose;
                }
            }
            $this->table_header .= $this->trClose;
            $this->table_body .=  $this->trClose;
        }
        $this->table_body .=  $this->tbodyclose;
        $this->downloadCsv();
    }

    /**
     * Genera un array con 2 sub arrays los cuales son los encabezados
     * del contenido y el cuerpo del contenido.
     *
     * @return array
     */
    public function getArray(){
        foreach($this->content as $key => $value){
            foreach ($this->content[$key] as $field_name => $field_value){

                if($key == 0 && !in_array($field_name,$this->omit_fields)){
                    $this->arrayHeaders[] = $field_name;
                }

                if(!in_array($field_name,$this->omit_fields)){
                    $this->arrayBody[$key][$field_name] = $field_value;
                }
            }
        }
        return ['headers'=>$this->arrayHeaders,'body'=>$this->arrayBody];
    }

    private function downloadCsv(string $file_name = 'data'){
        if($this->downloable == true){
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$file_name.xls");

            echo $this->tableOpen . $this->table_header . $this->table_body . $this->tableClose;
        }else{
            echo $this->tableOpen . $this->table_header . $this->table_body . $this->tableClose;
        }
    }

}
