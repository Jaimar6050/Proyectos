from flask import Blueprint, jsonify
from utils.db import get_connection

venta_bp = Blueprint('ventas', __name__)

@venta_bp.route('/reporte/ventas', methods=['GET'])
def reporte_ventas():
    try:
        conn = get_connection()
        cur = conn.cursor()

        # Ajustado a los campos reales de la tabla 'ventas'
        cur.execute("""
            SELECT id, nombre_cliente, user_id, producto_id, cantidad, monto FROM ventas
        """)
        rows = cur.fetchall()
        cur.close()
        conn.close()

        ventas = [
            {
                'id': r[0],
                'nombre_cliente': r[1],
                'user_id': r[2],
                'producto_id': r[3],
                'cantidad': r[4],
                'monto': float(r[5]),

            }
            for r in rows
        ]

        return jsonify(ventas), 200

    except Exception as e:
        return jsonify({'error': str(e)}), 500
