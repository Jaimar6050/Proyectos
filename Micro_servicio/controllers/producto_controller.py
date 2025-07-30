from flask import Blueprint, jsonify
from utils.db import get_connection

producto_bp = Blueprint('productos', __name__)

@producto_bp.route('/reporte/productos', methods=['GET'])
def reporte_productos():
    conn = get_connection()
    cur = conn.cursor()
    cur.execute("SELECT id, nombre, cantidad, precio, descripcion FROM productos")
    rows = cur.fetchall()
    cur.close()
    conn.close()
    productos = [
        {'id': r[0], 'nombre': r[1], 'cantidad': r[2], 'precio': r[3], 'descripcion': r[4]}
        for r in rows
    ]
    return jsonify(productos)
