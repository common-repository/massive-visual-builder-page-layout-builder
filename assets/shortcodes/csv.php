<?php
/**
 * shortcodes-ultimate.3.9.5
 * http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
/**	 * Csv files parser
	 * Converts csv-files to html-tables
	 *
	 * @param type $file File url to parse
	 */
	function su_mvb_parse_csv( $file ) {
		$csv_lines = file( $file );
		if ( is_array( $csv_lines ) ) {
		
			$cnt = count( $csv_lines );
			for ( $i = 0; $i < $cnt; $i++ ) {
				$line = $csv_lines[$i];
				$line = trim( $line );
				
				$first_char = true;
			
				$col_num = 0;
				$length = strlen( $line );
				for ( $b = 0; $b < $length; $b++ ) {
				
					if ( $skip_char != true ) {					
						
						$process = true;
						
						if ( $first_char == true ) {
							if ( $line[$b] == '"' ) {
								$terminator = '";';
								$process = false;
							}
							else
								$terminator = ';';
							$first_char = false;
						}

				
						if ( $line[$b] == '"' ) {
							$next_char = $line[$b + 1];
						
							if ( $next_char == '"' )
								$skip_char = true;
						
							elseif ( $next_char == ';' ) {
								if ( $terminator == '";' ) {
									$first_char = true;
									$process = false;
									$skip_char = true;
								}
							}
						}

					
						if ( $process == true ) {
							if ( $line[$b] == ';' ) {
								if ( $terminator == ';' ) {

									$first_char = true;
									$process = false;
								}
							}
						}

						if ( $process == true )
							$column .= $line[$b];

						if ( $b == ($length - 1) ) {
							$first_char = true;
						}

						if ( $first_char == true ) {

							$values[$i][$col_num] = $column;
							$column = '';
							$col_num++;
						}
					}
					else
						$skip_char = false;
				}
			}
		}

		$return = '<table><tr>';

		foreach ( $values[0] as $value ) {
			$return .= '<th>' . $value . '</th>';
		}
		$return .= '</tr>';

		array_shift( $values );

		foreach ( $values as $rows ) {

			$return .= '<tr>';
			foreach ( $rows as $col ) {
				$return .= '<td>' . $col . '</td>';
			}
			$return .= '</tr>';

		}

		$return .= '</table>';

		return $return;
	}

?>