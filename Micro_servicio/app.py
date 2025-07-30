from flask import Flask
from flask_cors import CORS
from controllers.producto_controller import producto_bp

from controllers.venta_controller import venta_bp

app = Flask(__name__)
CORS(app)

app.register_blueprint(producto_bp)

app.register_blueprint(venta_bp)

if __name__ == '__main__':
    app.run(debug=True)
