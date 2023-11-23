from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/guardar_actividad', methods=['POST'])
def guardar_actividad():
    carne = request.form.get('carne')
    fecha = request.form.get('fecha')
    hora_inicio = request.form.get('horaInicio')
    hora_fin = request.form.get('horaFin')
    total = request.form.get('total')

    # Puedes procesar los datos y guardarlos en la base de datos aquí

    return jsonify({"mensaje": "Actividad guardada correctamente"})

if __name__ == '__main__':
    app.run(debug=True)
