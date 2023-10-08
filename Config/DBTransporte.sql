create database transporte

use transporte

-- Crear la tabla Localidad
CREATE TABLE Localidad (
    IDLocalidad INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255)
);

-- Crear la tabla Cliente
CREATE TABLE Cliente (
    IDCliente INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255),
    Direccion VARCHAR(255),
    IDLocalidad INT,
    TipoIVA VARCHAR(50),
    DNI VARCHAR(20),
    CUIT VARCHAR(20),
    Telefono VARCHAR(20),
    Email VARCHAR(255),
    Observaciones TEXT,
    FOREIGN KEY (IDLocalidad) REFERENCES Localidad(IDLocalidad) ON DELETE CASCADE
);

-- Crear la tabla Servicio
CREATE TABLE Servicio (
    IDServicio INT PRIMARY KEY AUTO_INCREMENT,
    TipoServicio VARCHAR(255),
    Descripcion TEXT,
    Costo DECIMAL(10, 2)
);

-- Crear la tabla Venta
CREATE TABLE Venta (
    IDVenta INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE,
    DetallesAdicionales TEXT,
    IDCliente INT,
    IDServicio INT,
    FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (IDServicio) REFERENCES Servicio(IDServicio)
);

-- Crear la tabla CuentaCorrienteCliente
CREATE TABLE CuentaCorrienteCliente (
    IDTransaccion INT PRIMARY KEY AUTO_INCREMENT,
    IDCliente INT,
    IDVenta INT, 
    Saldo DECIMAL(10, 2),
    FechaTransaccion DATE,
    FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente) ON DELETE CASCADE,
    FOREIGN KEY (IDVenta) REFERENCES Venta(IDVenta) -- Relación con la venta
);

-- Crear la tabla Proveedor
CREATE TABLE Proveedor (
    IDProveedor INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255),
    Direccion VARCHAR(255),
    IDLocalidad INT,
    TipoIVA VARCHAR(50),
    DNI VARCHAR(20),
    CUIT VARCHAR(20),
    Telefono VARCHAR(20),
    Email VARCHAR(255),
    Observaciones TEXT,
    FOREIGN KEY (IDLocalidad) REFERENCES Localidad(IDLocalidad) ON DELETE CASCADE
);

-- Crear la tabla Compra
CREATE TABLE Compra (
    IDCompra INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE,
    TipoCompra VARCHAR(255),
    DetallesAdicionales TEXT,
    Monto DECIMAL(10, 2), -- Nueva columna para el monto
    IDProveedor INT,
    FOREIGN KEY (IDProveedor) REFERENCES Proveedor(IDProveedor) ON DELETE CASCADE
);

-- Crear la tabla CuentaCorrienteProveedor
CREATE TABLE CuentaCorrienteProveedor (
    IDTransaccion INT PRIMARY KEY AUTO_INCREMENT,
    IDProveedor INT,
    IDCompra INT,
    Saldo DECIMAL(10, 2),
    FechaTransaccion DATE,
    FOREIGN KEY (IDProveedor) REFERENCES Proveedor(IDProveedor) ON DELETE CASCADE,
    FOREIGN KEY (IDCompra) REFERENCES Compra(IDCompra) 
);

-- Crear la tabla Caja
CREATE TABLE Caja (
    IDCaja INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE,
    TipoOperacion VARCHAR(255),
    Descripcion TEXT,
    IDCompra INT NULL, -- Puede ser nulo
    IDVenta INT NULL, -- Puede ser nulo
    IDTransaccion INT NULL, -- Puede ser nulo
    FOREIGN KEY (IDCompra) REFERENCES Compra(IDCompra) ON DELETE CASCADE,
    FOREIGN KEY (IDVenta) REFERENCES Venta(IDVenta) ON DELETE CASCADE,
    FOREIGN KEY (IDTransaccion) REFERENCES CuentaCorrienteCliente(IDTransaccion) ON DELETE CASCADE,
    FOREIGN KEY (IDTransaccion) REFERENCES CuentaCorrienteProveedor(IDTransaccion) ON DELETE CASCADE
);


-- Insertar datos en la tabla Localidad (ejemplo: localidades de Argentina)
INSERT INTO Localidad (Nombre) VALUES
    ('Buenos Aires'),
    ('Córdoba'),
    ('Rosario'),
    ('Mendoza'),
    ('La Plata');

-- Insertar datos en la tabla Cliente
INSERT INTO Cliente (Nombre, Direccion, IDLocalidad, TipoIVA, DNI, CUIT, Telefono, Email, Observaciones) VALUES
    ('Juan Pérez', 'Calle 123', 1, 'Responsable Inscripto', '12345678', '20123456781', '123-4567890', 'juan@example.com', 'Cliente regular'),
    ('María López', 'Avenida 456', 2, 'Monotributista', '98765432', '20987654324', '987-6543210', 'maria@example.com', 'Cliente preferencial'),
    ('Carlos Rodríguez', 'Calle 789', 3, 'Responsable Inscripto', '56781234', '20567890123', '567-8901234', 'carlos@example.com', 'Cliente ocasional'),
    ('Laura García', 'Av. Libertador 123', 4, 'Exento', '34567890', '20345678903', '345-6789012', 'laura@example.com', 'Cliente nuevo'),
    ('Pedro Martínez', 'Rivadavia 456', 5, 'Responsable Inscripto', '87654321', '20876543216', '876-5432109', 'pedro@example.com', 'Cliente frecuente');

-- Insertar datos en la tabla Servicio
INSERT INTO Servicio (TipoServicio, Descripcion, Costo) VALUES
    ('Paquete Grande', 'Transporte de bultos grandes', 100.00),
    ('Paquete Pequeño', 'Transporte de paquetes pequeños', 50.00),
    ('Servicio Especial', 'Transporte de carga especializada', 150.00),
    ('Envío Rápido', 'Entrega exprés de paquetes', 75.00),
    ('Envío Urgente', 'Entrega urgente en 24 horas', 120.00);

-- Insertar datos en la tabla Venta
INSERT INTO Venta (Fecha, DetallesAdicionales, IDCliente, IDServicio) VALUES
    ('2023-10-01', 'Paquete Grande', 1, 1),
    ('2023-10-02', 'Paquete Pequeño', 2, 2),
    ('2023-10-03', 'Servicio Especial', 3, 3),
    ('2023-10-04', 'Envío Rápido', 4, 4),
    ('2023-10-05', 'Envío Urgente', 5, 5);

-- Insertar datos en la tabla CuentaCorrienteCliente
INSERT INTO CuentaCorrienteCliente (IDCliente, IDVenta, Saldo, FechaTransaccion) VALUES
    (1, 1, 100.00, '2023-10-01'),
    (2, 2, 75.00, '2023-10-02'),
    (3, 3, 120.00, '2023-10-03'),
    (4, 4, 200.00, '2023-10-04'),
    (5, 5, 50.00, '2023-10-05');


-- Insertar datos en la tabla Proveedor
INSERT INTO Proveedor (Nombre, Direccion, IDLocalidad, TipoIVA, DNI, CUIT, Telefono, Email, Observaciones) VALUES
    ('Juan Pérez', 'Calle Proveedor 1', 1, 'Responsable Inscripto', '12345678', '30123456781', '123-4567890', 'proveedor1@example.com', 'Proveedor A: Suministros de oficina'),
    ('María López', 'Avenida Proveedor 2', 2, 'Monotributista', '98765432', '30987654324', '987-6543210', 'proveedor2@example.com', 'Proveedor B: Material de construcción'),
    ('Carlos Rodríguez', 'Calle Proveedor 3', 3, 'Responsable Inscripto', '56781234', '30567890123', '567-8901234', 'proveedor3@example.com', 'Proveedor C: Electrónica'),
    ('Laura García', 'Av. Proveedor 4', 4, 'Exento', '34567890', '30345678903', '345-6789012', 'proveedor4@example.com', 'Proveedor D: Alimentos'),
    ('Pedro Martínez', 'Rivadavia Proveedor 5', 5, 'Responsable Inscripto', '87654321', '30876543216', '876-5432109', 'proveedor5@example.com', 'Proveedor E: Muebles');


-- Insertar datos en la tabla Compra con montos
INSERT INTO Compra (Fecha, TipoCompra, DetallesAdicionales, Monto, IDProveedor) VALUES
    ('2023-09-15', 'Combustible', 'Compra de combustible para la flota de vehículos', 1500.00, 1),
    ('2023-09-20', 'Repuestos', 'Compra de repuestos para mantenimiento de vehículos', 1200.00, 2),
    ('2023-09-25', 'Aceite', 'Compra de aceite para motores', 800.00, 3),
    ('2023-09-30', 'Servicios', 'Pago de servicios de luz y gas', 500.00, 4),
    ('2023-10-05', 'Repuestos', 'Compra de repuestos para mantenimiento de vehículos', 900.00, 5);

-- Insertar datos en la tabla CuentaCorrienteProveedor
INSERT INTO CuentaCorrienteProveedor (IDProveedor, IDCompra, Saldo, FechaTransaccion) VALUES
    (1, 1, 1500.00, '2023-09-15'),
    (2, 2, 1200.00, '2023-09-20'),
    (3, 3, 800.00, '2023-09-25'),
    (4, 4, 500.00, '2023-09-30'),
    (5, 5, 900.00, '2023-10-05');

-- Insertar datos en la tabla Caja
INSERT INTO Caja (Fecha, TipoOperacion, Descripcion, IDCompra, IDVenta, IDTransaccion) VALUES
    ('2023-10-01', 'Ingreso', 'Ingreso por venta', NULL, 1, NULL),
    ('2023-10-02', 'Egreso', 'Pago de proveedor', 1, NULL, NULL),
    ('2023-10-03', 'Ingreso', 'Ingreso por venta', NULL, 2, NULL),
    ('2023-10-04', 'Egreso', 'Pago de proveedor', 2, NULL, NULL),
    ('2023-10-05', 'Ingreso', 'Ingreso por venta', NULL, 3, NULL);