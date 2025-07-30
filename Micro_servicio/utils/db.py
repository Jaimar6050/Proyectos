import psycopg2
from config import config

def get_connection():
    cfg = config['development']
    return psycopg2.connect(
        dbname=cfg['POSTGRES_DB'],
        user=cfg['POSTGRES_USER'],
        password=cfg['POSTGRES_PASSWORD'],
        host=cfg['POSTGRES_HOST'],
        port=cfg['POSTGRES_PORT']
    )
